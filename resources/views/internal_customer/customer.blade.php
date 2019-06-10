<h1>List of Internal Customers</h1>

{{-- to get the variable from route we use {{$variable_name}}
$variable_name is the name that we pass into an array from route
--}}

<h3>Cutomers for department: {{ $dep }}  </h3> 
<ul>
    
    <?php
    
        foreach($list as $person){
            echo '<li>' .$person.  '</li>';
        }
    
    ?>

    {{--Using syntax for blade template to get the variables from the route --}}

    {{-- 
    
        @foreach ($list as $person)
            <li> {{ $person }} </li>
         @endforeach
    
    --}}
    
</ul>