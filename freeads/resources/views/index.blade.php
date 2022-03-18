@extends('layout')

@section('contenu')
    <section class="entire-page-index">


    <nav class="left-filter">
        <form action='/index' method='post'> 
       
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input  type="submit" name="submit"  value="A to z">
        <input  type="submit" name="submit"  value="Z to a">
        
        
        <input  type="submit" name="submit" value="Price asc">
        <input  type="submit" name="submit" value=" Price desc">
        
        
        <input type="submit" name="submit" value="Date asc">
        <input  type="submit" name="submit" value=" Date desc">
       
       </form>
        <!-- <div class="price-choice">
            <label for="price-filter">Price</label><br>
            <input type="number" id="price-filter-min" name="price-min" class="price-filter" min="0">
            <input type="number" id="price-filter-max" name="price-max" class="price-filter" max="100000">
        </div>
         
        <div class="category">
            foreach category as categories <br>
            <input type="checkbox" id="category-list" class="category">
            <label for="category-list" class="list-sql">get category</label>
            if checkbox checked SELECT * FROM category

        </div> --> 


                <input type="submit" name="submit" value="Date asc">
                <input type="submit" name="submit" value=" Date desc">

            </form>


        <nav class="product-display">



        <nav class="product-display">
            @foreach($ads as$ad)

                <div class="product-box">
                    <div class="left-box">
                        <div class="ads-picture"><img src="storage/{{$ad->picture}}">
                        </div>
                        <div class="ads-price">{{$ad->price}}</div>
                    </div>
                    <div class="right-box">
                        <div class="ads-name">{{$ad->title}}</div>
                        <div class="ads-desc">{{$ad->description}}</div>
                        <div class="ads-location">{{$ad->location}}</div>
                        <div class="ads-user">Sold by {{$ad->nickname}}</div>
                    </div>
                </div>
            @endforeach


        </nav>
    </section>
@endsection

