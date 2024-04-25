export type WorkshopType = {
    id?: number;
    school?: string | null;
    name?: string | null;
    date: Date;
    end_date: Date;
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