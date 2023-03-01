@extends('layouts.app')

@section('content')

<div class="container col-md-12">
  <form id="bill" onsubmit="" method="post" action="{{route('bill.post')}}">
    @csrf
    <!-- MY BILL FIELDS -->
    <input type="text" value="{{ $customers[0] }}" name="client" id="client" hidden>
    <input type="text" value="{{ $products[0] }}" name="product" id="product" hidden>
    <input type="text" value="00.00" name="totalPrice" id="totalPrice" hidden>


    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputItem">Item</label>
        <select class="form-select form-control" id="inputItem" aria-label="Default select example" onclick="productSelect(value)">
          @foreach ($products as $product)
          <option value="{{$product}}">{{ $product->product_name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="inputCustomer">Customer</label>
        <select class="form-select form-control" id="inputCustomer" aria-label="Default select example" onclick="clientSelect(value)">
          @foreach($customers as $customer)
          <option value="{{$customer}}">{{$customer->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Qty</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody id="tBody">
          <tr>
            <th scope="row">1</th>
            <td>Item</td>
            <td>Qty</td>
            <td>Price</td>
          </tr>
        </tbody>
      </table>
    </div>

    <h4>total price: 
      <p id="totalPrice">00.00</p>
    </h4>

    <button type="submit" class="btn btn-success">Save</button>
  </form>
</div>

@endsection

@section('script')

<!-- SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<script>
  let items = 0;

  function productSelect(product) {
    let productField = document.getElementById('product');
    productField.value = product;

    // product is json string so parse it to could access product price
    calculateBillTotalPrice(JSON.parse(product)["product_price"]);
  }

  function clientSelect(customer) {
    let client = document.getElementById('client');
    client.value = customer;
  }

  function calculateBillTotalPrice(price){
    console.log(price);
  }
</script>

@endsection