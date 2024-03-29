@extends('backend.master')
@section('title')
    Cashiers
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cashiers Data</h3>
            <div class="card-tools">
                <a type="button" href="{{ route('users.create')}}" class="btn btn-tool" >
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
                        <th >
                            Name
                        </th>
                        <th class="text-center">
                            Email
                        </th>
                        <th  class="text-center">
                            Phone number
                        </th>
                        <th style="width: 40%" class="text-right" style="margin-right: 10px;">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $cashier) 
                    <tr>
                        <td>
                            {{ $loop->iteration + $users->perpage() * ($users->currentpage() - 1) }}
                        </td>
                        <td>
                            <a>{{ $cashier->name}}</a>
                            <br />
                            <small>{{ $cashier->created_at}}</small>
                        </td>
                        <td class="text-center">{{ $cashier->email}}</td>
                        <td class="text-center">{{ $cashier->phone}}</td>
                        <td class="project-actions text-right">
                            <form action="{{ route('users.destroy', [$cashier->id]) }}"
                                onsubmit="return confirm('apakah anda yakin ingin menghapus,{{ $cashier->name }}?..')"
                                method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.show', $cashier->id) }}">
                                    <i class="fas fa-folder"></i> View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('users.edit', $cashier->id) }}">
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
