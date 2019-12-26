@if (session('success_msg'))
                  <div class="alert alert-success" role="alert">
                                  {{ session('success_msg') }}<br>
                  </div>
                  @endif