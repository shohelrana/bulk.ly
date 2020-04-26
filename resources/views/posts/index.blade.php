@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body">
    <div class="row">
        <div class="col-md-12">
            <h2>Recent Posts Sent to Butter</h2>

            <div class="row">
                <div class="col-md-3"></div>
            </div>

            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" method="POST" action="{{url('posts')}}">
                    {{csrf_field()}}
                    <input class="form-control mr-sm-2" name="search_text" type="search" placeholder="Search" aria-label="Search">
                    <input class="form-control mr-sm-2" name="date" type="date" placeholder="Select date" aria-label="Search">
                    <select class="custom-select mr-sm-2" name="group" id="inlineFormCustomSelect" style="height: 32px; min-width: 150px">
                        <option selected id="0">All groups</option>
                        @foreach($groups as $group)
                            <option id="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Group Name</th>
                        <th scope="col">Group Type</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Post Text</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->group_name}}</td>
                            <td>{{$post->group_type}}</td>
                            <td><img width="48" height="48" src="{{$post->avatar}}" style="border-radius: 50%;"></td>
                            <td>{{$post->post_text}}</td>
                            <td>{{$post->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>

                <div class="text-center">
                    {{$posts->links()}}
                </div>
        </div>
    </div>
    </div>
@endsection