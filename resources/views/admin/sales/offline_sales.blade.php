@extends('admin.layout')
@section('main')

@livewire('invoice')

@endsection
@section('footer')
<script>
    function ProductSelect() {
        // let product_name = document.getElementById("product").value;
        // alert('dd');
        // alert(product_name);

        var e = document.getElementById("product");
        // var value = e.value;
        // alert(value);
        var text = e.options[selectedIndex].text;
        alert(text);
    }

  </script>
@endsection
