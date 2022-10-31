import { Entity } from "@/interfaces/entity";

export class Product implements Entity{
    id: number;
    name: string;
    description: string;
    tension: string;
    brand: string;
    image: string;

    constructor(id: number = 0, name: string = '', description: string = '', tension: string = '', brand: string = '', image: string = '') {
        this.id = id;
        this.name = name;
        this.description = description;
        this.tension = tension;
        this.brand = brand;
        this.image = image;
    }
}