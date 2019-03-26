@extends('layouts.master')
@section('content')
<div class="container marketing">
  <!-- Three columns of text below the carousel -->
<div class="introSection">
  <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <!-- <form action="" method="get" role="form"> -->
      <?php foreach ($categories as $category): ?>
        <a class="btn menu" data-id="{{$category->id}}" data-name="{{$category->name}}" href="" title="">{{$category->name}}</a>
       <!--  <button type="button" class="btn menu" data-id="{{$category->id}}" data-name="{{$category->name}}">{{$category->name}}</button> -->
      <?php endforeach ?>
      <!-- </form> -->
    </div>
  </div>
</div>
</div>
<div class="container">
  <div class="row sp">
    <?php foreach ($products as $product): ?>
     <div class="col-lg-2 product wow slideInDown">
      <img src="{{asset('food/themes/assets/images/salate.png')}}" alt="Generic placeholder image">
      <h4 class="name">{{$product->name}}</h4>
      <h4 class="price">{{number_format($product->price)}} <span>đ</span></h4>
      <p><a class="btn btn-default btn-add" rowId="{{$product->id}}" href="" role="button">Add to cart &raquo;</a></p>
    </div>
  <?php endforeach ?>
</div>
</div>
<!-- /END THE FEATURETTES -->
@endsection
