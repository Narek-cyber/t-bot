<b>New error</b>
Test: <i>{{ $e->getMessage() }}</i>
File: <i>{{ $e->getFile() }}</i>
Line: <i>{{ $e->getLine() }}</i>

@if(Auth::user())
    User: {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
@endif
