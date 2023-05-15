<template>
    <div class="container">
        <Navbar />
        <h1>Dashboard</h1>
        <p>User name: {{ currentUser.name }}</p>
        <button class="btn btn-danger" @click.prevent="Logout"> Logout</button>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Position</th>
                        <th>E-mail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="emp in employe" :key="emp.id">
                        <td>{{ emp.id }}</td>
                        <td>{{ emp.name }}</td>
                        <td>{{ emp.position }}</td>
                        <td>{{ emp.email }}</td>
                        <td>
                            <router-link :to="{ name: 'Edit', params: {id: emp.id }}" class="btn btn-success">Edit</router-link>
                            <a @click="deleteemploye(emp.id)" href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Navbar from './Navbar.vue'
export default {
    name: 'Dashboard',

    components: {
        Navbar
    },

    data() {
        return {
            employe: [],
            currentUser: {},
            token: localStorage.getItem('token')
        }
    },
    methods: {
        async readEmploye() {
            axios.get('api/read').then((response) => {
                this.employe = response.data
                console.log(response)
            }).catch((errors) => {
                console.log(errors)
            })
        },

        deleteemploye(employe_id) {
            this.$swal.fire({
                title: 'Are you sure',
                text: 'You want to delete?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                confirmButtonColor: '#3085d6'
            }).then((result) => {
                if(result.isConfirmed) {
                    axios.post('employe/delete/' + employe_id).then((response) => {
                        this.readEmploye()
                        console.log(response)
                    })
                    this.$swal.fire(
                        'Deleted',
                        'your action has been complted',
                        'success'
                    )
                }
            })
        },
        Logout() {
            axios.post('/logout').then((response) =>{
                localStorage.removeItem('token')
                this.$router.push('/')
                this.$toast.success(response.data)
            }).catch((errors) => {
                console.log(errors)
            })
        }
    },

    mounted() {

        window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
        this.readEmploye()

        //get user data
        axios.get('api/user').then((response) => {
            this.currentUser = response.data
            console.log(response.data)
        }).catch((errors) =>{
            console.log(errors)
        })
    }
}

</script>