@extends('layouts.app')

@section('banner')
	@include('layouts.main-banner')
@endsection

@section('content')
	<section id="about" class="pt-64 pb-64">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center">About Redbird E-Sports</h2>
				</div>
			</div>

			<div class="row mt-64" style="display: flex;">
				<div class="col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-right" style="margin-top: auto; margin-bottom: auto;">
					<img src="https://pbs.twimg.com/profile_images/1207769579054874635/x8bFHthj_400x400.jpg" class="img-fluid centered" style="border-radius: 100%;">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin-top: auto; margin-bottom: auto;">
					<h3 data-aos="fade-up" class="mt-64-mobile mobile-text-center">Gaming for ISU Students</h3>
					<p data-aos="fade-up" class="mobile-text-center">Our e-sports organization is the place where both serious and casual gamers can come together to enjoy the same thing: playing video games. We welcome any playing experience.</p>
					<div class="icon-box mt-32" data-aos="fade-up">
						<h5 class="mobile-text-center"><i class="bx bx-receipt"></i> Choose From a List of Games</h5>
						<p class="mobile-text-center">We all play and enjoy a large variety of games so we make sure that everyone can enjoy the games they like.</p>
					</div>

					<div class="icon-box mt-32" data-aos="fade-up" data-aos-delay="100">
						<h5 class="mobile-text-center"><i class="bx bx-door-open"></i> Any Gaming Experience Welcome</h5>
						<p class="mobile-text-center">This isn't a club just for professional gamers. We have events for casual gamers to take a break from school.</p>
					</div>

					<div class="icon-box mt-32" data-aos="fade-up" data-aos-delay="200">
						<h5 class="mobile-text-center"><i class="bx bx-comment-detail"></i> Join our Discord and Mobile App</h5>
						<p class="mobile-text-center">We use Discord for our group chat and organize events through our mobile app. Make sure to join and download!</p>
					</div>

				</div>
			</div>

		</div>
	</section>

	<section id="team" class="team">
		<div class="container">

			<div class="section-title" data-aos="fade-up">
				<h2>Meet the Team</h2>
				<p>We founded the organization in late 2019 in response to the growing number of requests of having an e-sports organization at Illinois State University. Since then, we've been working on getting new events up, bring in more people and help expand our reach on campus.</p>
			</div>

			<div class="row">

				<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
					<div class="member">
						<img src="{{ URL::asset('img/team/team-1.jpg') }}" class="img-fluid" alt="">
						<div class="member-info">
							<div class="member-info-content">
								<h4>Walter White</h4>
								<span>Organization Founder</span>
							</div>
							<div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
					<div class="member">
						<img src="{{ URL::asset('img/team/team-2.jpg') }}" class="img-fluid" alt="">
						<div class="member-info">
							<div class="member-info-content">
								<h4>Sarah Johnson</h4>
								<span>Teams Manager</span>
							</div>
							<div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
					<div class="member">
						<img src="{{ URL::asset('img/team/team-3.jpg') }}" class="img-fluid" alt="">
						<div class="member-info">
							<div class="member-info-content">
								<h4>William Anderson</h4>
								<span>Teams Manager</span>
							</div>
							<div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
					<div class="member">
						<img src="{{ URL::asset('img/team/team-4.jpg') }}" class="img-fluid" alt="">
						<div class="member-info">
							<div class="member-info-content">
								<h4>Amanda Jepson</h4>
								<span>Treasurer</span>
							</div>
							<div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>

	<section id="app" style="background-color: #f0f0f0;">
		<div class="container pt-64 pb-64">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-8 col-sm-12 col-12">
					<h2 class="text-center">Stay Updated</h2>
					<p class="text-center">We're currently working with our friendly IT students on creating a mobile application so everyone can subscribe to the games they enjoy and stay updated about events they would be interested in.</p>
					<button class="btn btn-disabled centered">Download Link Coming Soon</button>
				</div>
			</div>
		</div>
	</section>

	<section id="contact" class="contact">
		<div class="container">

			<div class="section-title" data-aos="fade-up">
				<h2 class="mb-0">Contact</h2>
				<p>Got a question? Let us know.</p>
			</div>

			<div class="row justify-content-center" data-aos="fade-up">
				<div class="col-lg-10">
					<form action="forms/contact.php" method="post" role="form" class="php-email-form">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 characters" />
								<div class="validate"></div>
							</div>
							<div class="col-md-6 form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validate"></div>
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 characters" />
							<div class="validate"></div>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
							<div class="validate"></div>
						</div>
						<div class="mb-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your message has been sent. Thank you!</div>
						</div>
						<div class="text-center"><button class="btn btn-danger">Send Message</button></div>
					</form>
				</div>

			</div>

		</div>
	</section>
@endsection