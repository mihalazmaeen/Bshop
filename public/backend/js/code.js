//Confirm Order
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
//Process Order
$(function(){
    $(document).on('click','#processing_order', function(e){
        e.preventDefault();
        let link=$(this).attr('href');
        Swal.fire({
            title: 'Process Order?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Process it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Sent to Processing!',
                    'Selected Order has been Processing.',
                    'success'
                )
            }
        })
    })
})
//Pick Order
$(function(){
    $(document).on('click','#picked_order', function(e){
        e.preventDefault();
        let link=$(this).attr('href');
        Swal.fire({
            title: 'Pick Order?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Pick it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Order Picked!',
                    'Selected Order has been Picked.',
                    'success'
                )
            }
        })
    })
})
//Ship Order
$(function(){
    $(document).on('click','#shipped_order', function(e){
        e.preventDefault();
        let link=$(this).attr('href');
        Swal.fire({
            title: 'Ship Order?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Ship it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Order Shipped!',
                    'Selected Order has been Shipped.',
                    'success'
                )
            }
        })
    })
})
//Deliver Order
$(function(){
    $(document).on('click','#delivered_order', function(e){
        e.preventDefault();
        let link=$(this).attr('href');
        Swal.fire({
            title: 'Deliver Order?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Deliver it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Order Delivered!',
                    'Selected Order has been Delivered.',
                    'success'
                )
            }
        })
    })
})
