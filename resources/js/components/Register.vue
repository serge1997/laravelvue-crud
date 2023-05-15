<template>
    <div class="container">
        <router-link class="btn btn-primary" to="/Dashboard">Go to Dashboard</router-link>
        <div class="card w-50 m-auto">
            <h5 class="card-header">Register</h5>
            <form class="p-2" @submit.prevent="create" method="post">
                <div class="form-group mb-4">
                    <label>Name: </label>
                    <input class="form-control border-secondary" type="text" name="name" v-model="user.name">
                    <p class="text-danger" v-text="errors.name"></p>
                </div>
                <div class="form-group mb-4">
                    <label>Position: </label>
                    <input class="form-control border-secondary" type="text" name="position" v-model="user.position">
                    <p class="text-danger" v-text="errors.position"></p>
                </div>
                <div class="form-group">
                    <label>E-mail: </label>
                    <input class="form-control border-secondary" type="text" name="email" v-model="user.email">
                    <p class="text-danger" v-text="errors.email"></p>
                </div>
                <div class="form-group mt-4">
                    <label>Password: </label>
                    <input class="form-control border-secondary" type="password" name="password" v-model="user.password">
                    <p class="text-danger" v-text="errors.password"></p>
                </div>
                <div class="form-group mt-4">
                    <input type="submit" class="btn btn-primary" value="create">
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Register',

    data() {
        return {
            user: {
                name: '',
                position: '',
                email: '',
                password: ''
            },

            errors: {}
        }
    },

    methods: {
        create() {
            axios.post('create', this.user).then((response) => {
                console.log(response)
                this.$router.push('/dashboard')
                this.$toast.success("User created successffully")
            }).catch((errors) => {
                this.errors = errors.response.data.errors
                console.log(errors.response.data.errors)
            })
        }
    }

}

</script>