$(function(){
    $(document).on('click','#confirm_order', function(e){
        e.preventDefault();
        let link=$(this).attr('href');
        Swal.fire({
            title: 'Confirm Order?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Confirmed!',
                    'Selected Order has been Confirmed.',
                    'success'
                )
            }
        })
    })
})
