export default defineNuxtRouteMiddleware(async (to, from) => {
    if (!process.client) return;
    if (to.meta.requiresAuth) {
        try {
            const isLoggedIn = localStorage.getItem('user');
            console.log(isLoggedIn);
            if (!isLoggedIn) return navigateTo('/login');
        } catch (e) {
            console.error('Error while checking session:', e);
            return navigateTo('/login');
        }
    }
});
