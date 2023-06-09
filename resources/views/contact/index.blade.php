@extends('layouts.app-master')
@section('content')
    @auth
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Category') }}
            </h2>

        </x-slot>
        <div class="mt-4 mb-4">

        </div>
        <table id="customers">
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($contact as $category)
                <tr>
                    <td> {{$category->id}}</td>
                    <td> {{$category->email}}</td>
                    <td> {{$category->number}}</td>
                    <td> {{$category->address}}</td>
                    <td> {{$category->created_at}}</td>
                    <td> {{$category->updated_at}}</td>
                    <td> <a href="{{ route('contact.edit',$category->id) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('contact.destroy',$category->id) }}" method="POST"
                              onsubmit="return confirm('{{ trans('are You Sure ? ') }}');"
                              style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger"
                                   value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endauth
    @guest
        <h1>Please Sign-up and ReadMe file or ask from Alif</h1>
    @endguest
@endsection
