<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EcommerceStoreTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_homepage_loads_successfully_with_raatrani_branding(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('RAATRANI');
        $response->assertSee('Where Artistry');
        $response->assertSee('Hand Block Printed');
    }

    public function test_shop_catalog_page_displays_products_and_filters(): void
    {
        $response = $this->get('/shop');

        $response->assertStatus(200);
        $response->assertSee('Complete Handcrafted Catalog');
        $response->assertSee('Signature Collections');
    }

    public function test_product_detail_page_loads_with_details_and_whatsapp_link(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        $response = $this->get('/product/'.$product->slug);

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee('Instant Order on WhatsApp');
        $response->assertSee('Add to Bag');
    }

    public function test_cart_item_can_be_added_via_ajax(): void
    {
        $product = Product::first();

        $response = $this->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
            'option' => 'Medium (M)',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('data.count', 1);
    }

    public function test_coupon_can_be_applied_to_cart(): void
    {
        $product = Product::first();
        $this->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->postJson('/cart/coupon/apply', [
            'code' => 'RAATRANI10',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_checkout_processes_order_and_creates_record(): void
    {
        $product = Product::first();
        $this->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
            'option' => 'King (108" x 108")',
        ]);

        $response = $this->post('/checkout/process', [
            'customer_name' => 'Meera Rajput',
            'customer_email' => 'meera@example.com',
            'customer_phone' => '+91 9988776655',
            'shipping_address' => 'Plot 45, Civil Lines',
            'shipping_city' => 'Jaipur',
            'shipping_state' => 'Rajasthan',
            'shipping_pincode' => '302006',
            'payment_method' => 'cod',
        ]);

        $this->assertDatabaseHas('orders', [
            'customer_email' => 'meera@example.com',
            'shipping_city' => 'Jaipur',
            'payment_method' => 'cod',
        ]);

        $order = Order::where('customer_email', 'meera@example.com')->first();
        $this->assertNotNull($order);
        $response->assertRedirect(route('checkout.confirmation', $order->order_number));
    }

    public function test_order_can_be_tracked(): void
    {
        $order = Order::first();
        $this->assertNotNull($order);

        $response = $this->post('/track-order', [
            'order_number' => $order->order_number,
            'identifier' => $order->customer_email,
        ]);

        $response->assertStatus(200);
        $response->assertSee($order->order_number);
        $response->assertSee('Delivery Progress');
    }

    public function test_contact_inquiry_can_be_submitted(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Rohit Verma',
            'email' => 'rohit@company.com',
            'phone' => '+91 9123456789',
            'inquiry_type' => 'corporate_gifting',
            'subject' => 'Corporate Hampers',
            'message' => 'Need 100 boxes for festive corporate gifting.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'rohit@company.com',
            'inquiry_type' => 'corporate_gifting',
        ]);
    }

    public function test_admin_portal_requires_admin_role(): void
    {
        // Unauthenticated -> redirected to login
        $this->get('/admin')->assertRedirect(route('login'));

        // Normal customer -> forbidden 403
        $customer = User::where('is_admin', false)->first();
        $this->actingAs($customer)->get('/admin')->assertStatus(403);

        // Admin user -> access granted 200
        $admin = User::where('is_admin', true)->first();
        $response = $this->actingAs($admin)->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Total Revenue');
        $response->assertSee('Recent Customer Orders');
    }
}
