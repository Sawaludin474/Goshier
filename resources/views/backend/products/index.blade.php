@extends('backend.master')
@section('title')
    Cashiers
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products Data</h3>
            <div class="card-tools">
                <a type="button" href="{{ route('products.create')}}" class="btn btn-tool" >
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 5%">
                            #
                        </th>
                        <th style="width: 20%;">
                            Product Name
                        </th>
                        <th class="text-center">
                            Image
                        </th>
                        <th  class="text-center">
                            Prices
                        </th>
                        <th style="width: 40%" class="text-right" style="margin-right: 10px;">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $food) 
                    <tr>
                        <td>
                            {{ $loop->iteration + $products->perpage() * ($products->currentpage() - 1) }}
                        </td>
                        <td>
                            <a>{{ $food->p_name}}</a>
                            <br />
                            <small>{{ $food->created_at}}</small>
                        </td>
                        <td class="text-center"><img src="{{ asset('storage/' . $food->image) }}" width="100PX" alt="{{$food->image}}">
                        </div></td>
                        <td class="text-center">Rp. {{ $food->price}}</td>
                        <td class="project-actions text-right">
                            <form action="{{ route('products.destroy', [$food->id]) }}"
                                onsubmit="return confirm('apakah anda yakin ingin menghapus,{{ $food->p_name }}?..')"
                                method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                                <a class="btn btn-primary btn-sm" href="{{ route('products.show', $food->id) }}">
                                    <i class="fas fa-folder"></i> View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('products.edit', $food->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                    <!-- Pastikan semua baris <tr> lainnya mengikuti format ini -->
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
    </div>
@endsection
