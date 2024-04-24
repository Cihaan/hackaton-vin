export type UserType = {
    email: string
    role: ['ROLE_USER' | 'ROLE_ADMIN'],
    is_confirmed?: boolean
}