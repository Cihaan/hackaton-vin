export default defineNuxtRouteMiddleware(async (to, from) => {
    if (to.meta.requiresAuth) {
        try {
            const isLoggedIn = localStorage.getItem('user');
            if (!isLoggedIn) return navigateTo('/login');
        } catch (e) {
            console.error('Error while checking session:', e);
            return navigateTo('/login');
        }
    }
});
