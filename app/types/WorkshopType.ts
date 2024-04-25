export type WorkshopType = {
    id?: number;
    school_id?: number | null;
    name?: string | null;
    date: Date;
    limitDrinker: number;
    password: string;
    theme?: string | null;
    description: string;
    deadline: Date;
    price: number;
    location: string;
    isCanceled: boolean;
    banner: string;
    mainImage: string;
}