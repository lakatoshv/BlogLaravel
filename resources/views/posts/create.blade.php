@extends("layouts.layout")
@section("title")
  <title>LaravelBlog - Контакти</title>
@endsection
@section("content")
  <link rel="stylesheet" href="{{ asset('css/post.css') }}">
  <section id="contact">
    <div class="container">
	    <h2 class="text-center" id="form-header"><i class="fa fa-envelope"></i> Форма зворотнього звязку</h2>
	    <div class="row justify-content-center">
			  <div class="col-12 col-md-8 col-lg-6 pb-5">
				  <form action="mail.php" method="post">
            <div class="card border-primary rounded-0">
              <div class="card-body p-3">
               	<div class="row">
                  <div class="col-lg-6 ml-auto text-center">
						       	<div class="form-group">
                      <div class="input-group mb-2">
                     		<div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-user text-info"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ім'я" required>
                      </div>
                    </div>
					        </div>
					        <div class="col-lg-6 mr-auto text-center">
					          <div class="form-group">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-envelope text-info"></i>
                          </div>
                        </div>
                        <input type="email" class="form-control" id="nombre" name="email" placeholder="Електронна пошта" required>
                      </div>
                 		</div>
					        </div>
                </div>
                <div class="form-group">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-comment text-info"></i>
                      </div>
                    </div>
                    <textarea class="form-control" placeholder="Повідомлення" required></textarea>
                  </div>
                </div>

                <div class="text-center">
                  <input type="submit" value="Надіслати" class="btn btn-info btn-block rounded-0 py-2">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

