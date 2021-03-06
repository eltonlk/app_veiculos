<?php

Form::macro('errorNotification', function() {
  if ($this->session->has('errors'))
  {
    return "<div class=\"alert alert-danger\"><p>". trans('validation.title') . "</p></div>";
  }
});

Form::macro('getInputErrors', function($name) {
  $errors = '';

  if ($this->session->has('errors'))
  {
    foreach ($this->session->get('errors')->get($name) as $index => $error)
    {
      $errors .= '<span class="help-block">' . $error . '</span>';
    }
  }

  return $errors;
});

Form::macro('formGroup', function($name, $input) {
  return '<div class="form-group' . (($this->session->has('errors') and $this->session->get('errors')->has($name)) ? ' has-error' : '' ) . '">' .
    Form::label($name, trans('validation.attributes.' . $name), array('class'=>'control-label')) .
    $input .
    Form::getInputErrors($name) .
  '</div>';
});

Form::macro('formGroupCheckbox', function($name, $input) {
  return '<div class="form-group' . (($this->session->has('errors') and $this->session->get('errors')->has($name)) ? ' has-error' : '' ) . '">' .
    '<label>' .
      $input .
      ' ' .
      trans('validation.attributes.' . $name) .
    '</label>' .
    Form::getInputErrors($name) .
  '</div>';
});

Form::macro('inputString', function($name) {
  $input = Form::text($name, Input::get($name), array('class'=>'form-control'));

  return Form::formGroup($name, $input);
});

Form::macro('inputText', function($name) {
  $input = Form::textarea($name, Input::get($name), array('class'=>'form-control'));

  return Form::formGroup($name, $input);
});

Form::macro('inputCollection', function($name, $collection) {
  $input = Form::select($name, $collection, Input::get($name), array('class'=>'form-control'));

  return Form::formGroup($name, $input);
});

Form::macro('inputEmail', function($name) {
  $input = Form::email($name, Input::get($name), array('class'=>'form-control'));

  return Form::formGroup($name, $input);
});

Form::macro('inputCurrency', function($name) {
  $value = Input::get($name);

  if ($value == null and $this->model) {
    $value = $this->model->{$name};
  }

  $input = Form::text($name, I18nHelper::n2c($value), array('class'=>'form-control currency'));

  return Form::formGroup($name, $input);
});

Form::macro('inputPassword', function($name) {
  $input = Form::password($name, array('class'=>'form-control'));

  return Form::formGroup($name, $input);
});

Form::macro('inputBoolean', function($name) {
  $input = Form::checkbox($name, 1, Input::get($name));

  return Form::formGroupCheckbox($name, $input);
});

Form::macro('inputDatepicker', function($name) {
  $value = Input::get($name);

  if ($value == null and $this->model) {
    $value = I18nHelper::l($this->model->{$name});
  }

  $input = '<div class="input-group date datepicker">' .
    Form::text($name, $value, array('class'=>'form-control')) .
    '<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>' .
    '</div>';

  return Form::formGroup($name, $input);
});

Form::macro('inputDateTimepicker', function($name) {
  $value = Input::get($name);

  if ($value == null and $this->model) {
    $value = I18nHelper::l($this->model->{$name}, 'datetime');
  }

  $input = '<div class="input-group date datepicker">' .
    Form::text($name, $value, array('class'=>'form-control')) .
    '<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>' .
    '</div>';

  return Form::formGroup($name, $input);
});

Form::macro('submitModel', function($url) {
  $text = trans('text.create');

  if ($this->model->id)
  {
    $text = trans('text.update');
  }

  return '<div class="form-group">' .
    Form::submit($text, array('class'=>'btn btn-primary')) .
    ' ' .
    trans('text.or') .
    ' ' .
    link_to($url, trans('text.cancel'), ['class' => 'link-to-cancel']) .
  '</div>';
});
