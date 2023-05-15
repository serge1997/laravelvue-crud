<template>
    <div class="container mt-4">
        <div class="card w-50 m-auto shadow">
            <h5 class="card-header">login</h5>
            <form class="p-2" @submit.prevent="Login">
                <div class="form-group">
                    <label for="">E-mail :</label>
                    <input type="text" class="form-control border-secondary" name="email" v-model="employe.email">
                    <p class="text-danger" v-text="errors.email"></p>
                </div>
                <div class="form-group mt-4">
                    <label for="">Password :</label>
                    <input type="password" class="form-control border-secondary" name="password" v-model="employe.password">
                    <p class="text-danger" v-text="errors.password"></p>
                </div>
                <div class="form-group mt-4">
                    <input class="btn btn-primary" type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Login',

        data() {
            return {
                employe: {
                    email: '',
                    password: '',
                    device_name: 'browser'
                },

                errors:{}
            }
        },
        methods: {
            Login() {
                axios.post('/login', this.employe).then((response) => {
                    localStorage.setItem('token', response.data)
                    this.$router.push('/dashboard')
                }).catch((errors) => {
                    this.errors = errors.response.data.errors
                    console.log(errors.response.data.errors)
                })
            }
        }
    }
</script>