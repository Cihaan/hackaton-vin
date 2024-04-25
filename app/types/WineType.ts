export type WineType = {
    id?: number;
    domain?: string | null;
    name: string;
    year: number;
    quantity: number;
    type: string;
    picture: string;
    service_temperature: number;
    service_kind: string;
    conservation : string;
    limit_date: Date;
    comment: string;
    grape_varieties : string;

}