@extends('layout')

@section('content')
<div class="container">
    <h1>Calculator</h1>
    <form method="POST" action="{{ route('calculate') }}">
        @csrf
        <input type="number" name="num1" placeholder="First Number" required>
        <input type="number" name="num2" placeholder="Second Number" required>
        <select name="operation" required>
            <option value="add">Add</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
        </select>
        <button type="submit">Calculate</button>
    </form>
    @if(isset($result))
        <h2>Result: {{ $result }}</h2>
    @endif
</div>
@endsection

