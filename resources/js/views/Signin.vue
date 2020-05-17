<template>
	<div>
		<div class="row signin-container">
			<v-col class="signin-col">
				<v-card class="signin-card" outlined>
    				<v-progress-linear indeterminate color="primary" v-show="buffer"></v-progress-linear>
					<v-container v-show="emailLogin">
						<v-form @submit="validateEmail" @submit.prevent>
							<h2 class="text-center">{{ $t('horizonpanel') }}</h2>
							<span class="headline mt-2 text-center">{{ $t('sign_in') }}</span>
							<span class="subtitle-1 mt-2 text-center">{{ $t('to_continue') }}</span>
							<v-text-field label="Email" v-model="email" :error-messages="emailErrors" class="mt-5 pl-3 pr-3" outlined required></v-text-field>
							<div class="submit-block pr-3">
								<v-btn class="float-right" @click="validateEmail" depressed color="primary">{{ $t('next') }} <v-icon right>mdi-arrow-right-circle</v-icon></v-btn>
							</div>
						</v-form>
					</v-container>
					<v-container v-show="passwordLogin">
						<v-form @submit="submitLogin" @submit.prevent>
							<h2 class="text-center">{{ $t('horizonpanel') }}</h2>
							<span class="headline mt-2 text-center">{{ $t('enter_password') }}</span>
							<span class="subtitle-1 mt-2 text-center">{{ email }}</span>
							<v-text-field label="Password" v-model="password" type="password" :error-messages="passwordErrors" class="mt-5 pl-3 pr-3" outlined required></v-text-field>
							<div class="submit-block pr-3">
								<v-btn class="float-right" @click="submitLogin" depressed color="primary">{{ $t('submit') }}</v-btn>
							</div>
						</v-form>
					</v-container>
				</v-card>
			</v-col>
		</div>
	</div>
</template>

<script>
	import t from "@/plugins/multilanguage";
	import axios from "axios";

	export default {
		name: "signin",
		data: () => ({
			email: '',
			emailErrors: [],
			password: '',
			passwordErrors: [],
			signin_outline: true,
			buffer: false,
			emailLogin: true,
			passwordLogin: false,
		}),
		methods: {
			validateEmail()
			{
				this.buffer = true;
				if (/.+@.+/.test(this.email))
				{
					var vdata = this; // We can't access this for functions inside this scope
					axios.get(window.location.origin + '/api/auth/verifyemail/' + this.email)
						.then(function (response) {
							switch(response.data.success) {
								case true:
									vdata.emailErrors = [];
									vdata.emailLogin = false;
									vdata.passwordLogin = true;
									vdata.buffer = false;
								break;
								case false:
									vdata.emailErrors = t.t('invalid_email');
									vdata.buffer = false;
								break;
								default:
									vdata.emailErrors = t.t('unknown_error');
									vdata.buffer = false;
							}
						  })
						.catch(function (error) {
							vdata.emailErrors = t.t('unknown_error');
							vdata.buffer = false;
    						console.log(error);
  						});
				} else {
					this.emailErrors = t.t('invalid_email');
					this.buffer = false; 
				}
			},
			submitLogin()
			{
				this.buffer = true;
				this.passwordErrors = [];
				var vdata = this; // We can't access this for functions inside this scope
				axios.post(window.location.origin + '/api/auth/signin', {
					email: this.email,
					password: this.password,
				})
					.then(function (response) {
						vdata.buffer = false;
						console.log(response.data.success.token)
					})
					.catch(function (error) {
						vdata.passwordErrors = t.t('invalid_password');
						vdata.buffer = false;
					});
			}
		}
	}
</script>

<style scoped>
	.signin-container {
		flex-direction: column;
		min-height: 100vh;
	}
	@media (min-width: 601px) {
		.signin-container::before {
			content: '';
			display: block;
			flex-grow: 0.7;
			height: 30px;
			-webkit-box-flex: 1
		}
		.signin-container::after {
			content: '';
			display: block;
			flex-grow: 0.5;
			height: 30px;
			-webkit-box-flex: 1
		}
	}
	@media (max-width: 601px) {
		.signin-card {
			border: 0 !important;
			background-color: initial !important;
		}
		.signin-col {
			padding: 0 !important;
		}
	}
	.signin-col {
		width: 450px;
		margin: 0 auto;
		flex-basis: 0 !important;
    	flex-grow: 1 !important;
	}

	.submit-block {
		height: 40px;
	}

	span {
		display: block;
	}
</style>

<style>
	.v-application {
		overflow: hidden;
	}
</style>