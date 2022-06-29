export type User = {
    id: number;
    image: string;
    firstName: string;
    lastName: string;
    maidenName: number;
    username: string;
    email: string;
    birthDate: string;
    gender: string;
    height: number;
    weight: number;
    address: {
        address: string;
        city: string;
        postalCode: number;
    };
}