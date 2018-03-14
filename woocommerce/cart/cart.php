<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

//do_action( 'woocommerce_before_cart' ); ?>

<div class="grid-x grid-margin-x">

	<form class="woocommerce-cart-form cell large-8" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>

		<table class="table shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
			<thead class="head">
				<tr>
					<th class="head-item product-name">Item</th>
					<th class="head-item product-price">Price</th>
					<th class="head-item product-quantity">Qty</th>
					<th class="head-item product-subtotal">Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<tr class="table-row woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<td class="product-item product-thumbnail">
								<div class="thumb-wrap">
									<?php echo get_the_post_thumbnail($product_id, 'full', array('class' => 'thumb') ); ?>
								</div>

								<?php
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="title" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								?>
							</td>

							<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
								<?php
									echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
								?>
							</td>

							<td class="product-quantity" data-title="Qty"><?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'    => "cart[{$cart_item_key}][qty]",
									'input_value'   => $cart_item['quantity'],
									'max_value'     => $_product->get_max_purchase_quantity(),
									'min_value'     => '0',
									'product_name'  => $_product->get_name(),
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?></td>

							<td class="subtotal product-subtotal" data-title="Subtotal">
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
								?>

								<div class="product-remove">
									<?php
										// @codingStandardsIgnoreLine
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="js-remove-product remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><span class="fa fa-trash" aria-hidden="true"></span></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											__( 'Remove this item', 'woocommerce' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
									?>
								</div>
							</td>
						</tr>
						<?php
					}
				}
				?>

				<?php do_action( 'woocommerce_cart_contents' ); ?>

				<tr>
					<td colspan="6" class="actions">

						<div class="actions-inner">
							<div class="wrap-1">
								<?php if ( wc_coupons_enabled() ) { ?>
									<div class="coupon">
										<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input class="coupon-input" type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
										<?php do_action( 'woocommerce_cart_coupon' ); ?>
									</div>
								<?php } ?>

								<a class="continue-shopping" href="<?php echo get_home_url(); ?>">
									<span class="fa fa-chevron-left" aria-hidden="true"></span>
									Continue Shopping
								</a>
							</div>

							<div class="wrap-2">
								<button type="submit" class="btn btn--tertiary button update-btn" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">
									<span class="fa fa-refresh" aria-hidden="true"></span>
									UPDATE SHOPPING CART
								</button>
							</div>
						</div>

						<?php do_action( 'woocommerce_cart_actions' ); ?>

						<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					</td>
				</tr>

				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_cart_table' ); ?>
	</form>

	<div class="cart-collaterals cell large-4">
		<?php
			/**
			 * Cart collaterals hook.
			 *
			 * @hooked woocommerce_cross_sell_display
			 * @hooked woocommerce_cart_totals - 10
			 */
			do_action( 'woocommerce_cart_collaterals' );
		?>
		<!-- Quantity Message -->
		<?php $error_text = get_field("cart_validation_text", 80); ?>
		<span class="js-cart-msg"><?php echo esc_html($error_text); ?></span>
	</div>

	<?php //do_action( 'woocommerce_after_cart' ); ?>

</div>