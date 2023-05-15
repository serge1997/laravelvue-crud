<template>
    <div class="d-flex justify-content-center">
        <router-link class="nav-link" to="/dashboard"> Dashboard</router-link>
        <router-link class="nav-link" to="/profil">Profil</router-link>
        <router-link class="nav-link" to="/register">Register</router-link>

        
    </div>
</template>

<script>
export default {
    name: 'Navbar'
}


</script>

<style scoped>
.nav-link {
    margin-right: 8px;
    font-weight: 600;
}
</style>