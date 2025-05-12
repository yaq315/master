<script src="js/jquery/jquery-2.2.4.min.js"></script>
   
<!-- All Plugins js -->
<script src="js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // JavaScript لتحديث عدد المنتجات في السلة عند إضافة منتج
    document.querySelector('.add-to-cart-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let formData = new FormData(this);
    
    fetch("{{ route('cart.add') }}", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartQuantity(); // تحديث عدد المنتجات في السلة
            Swal.fire({
                icon: 'success',
                title: 'Added to Cart',
                text: 'The product has been added successfully!',
                timer: 1500,
                showConfirmButton: false
            });
        } else {
            // الكمية المطلوبة أكثر من المتوفرة
            Swal.fire({
                icon: 'error',
                title: 'Quantity Exceeded',
                text: data.message
            });
        }
    });
});

  
    
    function updateCartQuantity() {
        fetch("{{ route('cart.items') }}")
        .then(response => response.json())
        .then(data => {
            let totalQuantity = 0;
            data.forEach(item => {
                totalQuantity += item.quantity; // إجمالي الكمية في السلة
            });
            document.querySelector('.cart-quantity').textContent = totalQuantity;
        });
    }

      
document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', function() {
        const cartId = this.dataset.cartId;
        const newQuantity = this.value;
        const maxQuantity = this.dataset.max;
        const row = this.closest('tr');
        const price = parseFloat(row.querySelector('td:nth-child(5)').textContent.replace('$', ''));

        if (parseInt(newQuantity) > parseInt(maxQuantity)) {
            Swal.fire({
                icon: 'error',
                title: 'Quantity Exceeded',
                text: `Only ${maxQuantity} items available in stock.`
            });
            this.value = maxQuantity;
            return;
        }

        fetch("{{ route('cart.update') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                cart_id: cartId,
                quantity: newQuantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // تحديث السعر الإجمالي للعنصر
                row.querySelector('.item-total').textContent = '$' + (price * newQuantity).toFixed(2);
                
                // تحديث الإجماليات
                document.getElementById('subtotal').textContent = '$' + data.totals.subtotal.toFixed(2);
                document.getElementById('shipping-cost').textContent = '$' + data.totals.shipping.toFixed(2);
                document.getElementById('total').textContent = '$' + data.totals.total.toFixed(2);
                
                Swal.fire({
                    icon: 'success',
                    title: 'Updated',
                    text: 'Quantity updated successfully!',
                    timer: 1200,
                    showConfirmButton: false
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while updating quantity.'
            });
        });
    });
});


   
   
   