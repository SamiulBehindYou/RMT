@extends('admin.layout')
@section('main')

@livewire('invoice')

@endsection
@section('footer')

@if (session()->has('checkout'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('checkout') }}",
    showConfirmButton: false,
    timer: 1500
    });
</script>
@endif

<script>

    // Price discount calculation
    function calculate(){
        let price = document.getElementById('price').value;
        let quantity = document.getElementById('quantity').value;
        let discount = document.getElementById('discount').value;

        if(discount > 100){
            alert('Discount must be less then 100% !')
        }else{
            let total = (((100 - discount)/100) * price) * quantity;
            document.getElementById('total').value = total;
        }

    }
</script>

@endsection
