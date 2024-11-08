@php
    $color = 'red';
    $fruite = ['mango', 'banana', 'papaya', 'grapes']

@endphp

<script>
    // var name = @json($fruite);
    // console.log(name);

    // var data = @json($fruite);
    // data.forEach(function(entry) {
    //     console.log(entry);
    // });
    var data = {{Js::from($fruite)}};
    data.forEach(function(entry){
        console.log(entry);
    });
    
    
</script>

