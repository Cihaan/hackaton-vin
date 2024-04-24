export type WorkshopType = {
    id: number;
    school_id: number;
    name: string;
    date: string;
    limitDrinker: number;
    password: string;
    theme: string;
    description: string;
    deadline: string;
    drinkers: [];
    price: number;
}