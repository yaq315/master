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
    </script>