@extends('master')
@section('content')
<div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-primary text-capitalize text-center">id</th>
                    <th scope="col" class="text-primary text-capitalize text-center">mac id</th>
                    <th scope="col" class="text-primary text-capitalize text-center">ip</th>
                    <th scope="col" class="text-primary text-capitalize text-center">first login</th>
                    <th scope="col" class="text-primary text-capitalize text-center">last login</th>
                    <th scope="col" class="text-primary text-capitalize text-center">date check</th>
                    <th scope="col" class="text-primary text-capitalize text-center">data full</th>
                    <th scope="col" class="text-primary text-capitalize text-center">location</th>
                    <th scope="col" class="text-primary text-capitalize text-center">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($macStaff as $row)
                    <tr>
                        <th scope="row"  class="text-center">{{ $row->id }}</th>
                        <td class="text-center">{{ $row->mac_id }}</td>
                        <td class="text-center">{{ $row->ip }}</td>
                        <td class="text-center">{{ $row->first_login }}</td>
                        <td class="text-center">{{ $row->last_login }}</td>
                        <td class="text-center">{{ $row->date_check }}</td>
                        <td class="text-center">{{ $row->data_full }}</td>
                        <td class="text-center">{{ $row->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
@endsection