@if ($solution->solution_template == "template_one")
@include('metronic.pages.solution.template_partial.template_one_content')
@elseif ($solution->solution_template == "template_two")
@include('metronic.pages.solution.template_partial.template_two_content')
@elseif ($solution->solution_template == "template_three")
@include('metronic.pages.solution.template_partial.template_three_content')
@elseif ($solution->solution_template == "template_four")
@include('metronic.pages.solution.template_partial.template_four_content')
@endif
