<template>
    <div class="container">
        <h1>Edit</h1>
        <div class="container">
        <router-link to="/">Go to login</router-link>
        <div class="col-12 justify-content-center">
            <div class="col-md-10">
                <form @submit.prevent="update" method="post">
                    <div class="form-group mb-4">
                        <label>Name: </label>
                        <input type="text" name="name" v-model="employe.name">
                    </div>
                    <div class="form-group mb-4">
                        <label>Position: </label>
                        <input type="text" name="position" v-model="employe.position">
                    </div>
                    <div class="form-group">
                        <label>E-mail: </label>
                        <input type="text" name="email" v-model="employe.email">
                    </div>
                    <div class="form-group mt-4">
                        <input type="submit" class="btn btn-primary" value="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {

    mounted() {
        this.getEmploye()
    },

    name: 'Edit',

    data() {
        return {
            employe: {}
        }
    },

    methods: {
        getEmploye() {
            axios.get('getemploye/'+ this.$route.params.id).then((response) => {
                this.employe = response.data
                console.log(response.data)
            }).catch((errors) => {
                console.log(errors)
            })
        },

        update() {
            axios.post('update/'+ this.$route.params.id, this.employe).then((response) => {
                console.log(response)
                this.$router.push('/dashboard')
            }).catch((error) => {
                console.log(error)
            })
            this.$toast.success("User updated succesffully")
        }
    },
}

</script>