@props(['type'])
 
<div class="alert alert-{{$type}}" role="alert" title="{{$title ?? 'No tiene valor'}}">
    <span class="font-medium"><strong>{{$title ?? 'No tiene valor'}}</strong>&nbsp;</span>{{$slot}}
</div>