<template>
    <div class="homepage container mx-auto p-6">
        <section class="introduction text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Welcome to My Portfolio</h1>
            <p class="text-lg text-gray-600 mt-4">Hi, I'm a web developer. Here are some of the projects I've worked on and the clients I've interacted with.</p>
        </section>
        <section class="projects mb-12">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="card bg-white shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-2xl font-medium text-gray-700 mb-2">Completed Projects</h3>
                    <p class="text-3xl font-bold text-blue-500">10</p>
                </div>
                <div class="card bg-white shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-2xl font-medium text-gray-700 mb-2">Ongoing Projects</h3>
                    <p class="text-3xl font-bold text-blue-500">3</p>
                </div>
            </div>
        </section>
        <section class="customers">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Customers</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="card bg-white shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-2xl font-medium text-gray-700 mb-2">Interacted Customers</h3>
                    <p class="text-3xl font-bold text-blue-500">13</p>
                </div>
                <div class="card bg-white shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-2xl font-medium text-gray-700 mb-2">Current Discussions</h3>
                    <p class="text-3xl font-bold text-blue-500">7</p>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    name: 'Homepage',
}
</script>
<style scoped>
</style>    