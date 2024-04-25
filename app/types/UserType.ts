export type UserType = {
    email?: string
    role?: ['ROLE_USER' | 'ROLE_ADMIN'],
    isConfirmed?: number
}