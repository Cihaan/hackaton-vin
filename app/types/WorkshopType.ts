export type WorkshopType = {
    id?: number;
    school_id?: number;
    name?: string | null;
    date: Date;
    limitDrinker: number;
    password?: string;
    theme: JSON;
    description: string;
    deadline: Date;
    drinkers?: JSON;
    price: number;
    location: string;
}