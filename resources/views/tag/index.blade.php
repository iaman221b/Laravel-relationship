@extends('layouts.app')
    @section('content')
        <link href="{{ asset('css/roleindex')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <div class="container">
            <form method="POST" action="/tag/store">
                {{ csrf_field() }}
                <table class="table table-striped">
                    <tr>
                        <th>Products</th>
                        <th>Tags</th> 
                    </tr>
                    <tr>
                        @foreach ($products as $product)
                            <td>{{$product->product_name}}</td>
                            <td>
                                @foreach ($tags as $tag)
                                    @php
                                    $isChecked = false;
                                    foreach ($product->tags as $key => $product_tag) {
                                        if ($product_tag->id == $tag->id) {
                                            $isChecked = true;
                                        
                                        }
                                    }
                                    @endphp
                                    <input type="checkbox" name="tag[{{$product->product_id}}][]" value="{{$tag->id}}"  {{$isChecked ? 'checked': ''}}> {{$tag->tags}} <br> 
                        @endforeach
                            </td> 
                    </tr>
                    @endforeach 
                </table>
                <button type="submit" class="btn btn-primary">Assign Task</button>

            </form>
        </div>
    @endsection
