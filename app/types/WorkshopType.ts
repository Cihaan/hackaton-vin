export type WorkshopType = {
    id?: number;
    school_id?: number | null;
    name?: string | null;
    date: Date;
    limitDrinker: number;
    password: string;
    theme: [string];
    description: string;
    deadline: Date;
    drinkers?: [];
    price: number;
    location: string;
    isCanceled: boolean;
}