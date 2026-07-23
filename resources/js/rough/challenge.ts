
type Product = {
    id: number;
    name: string;
    category: string;
    price: number;
};

const products: Product[] = [
    { id: 1, name: "iPhone", category: "Phones", price: 1200 },
    { id: 2, name: "Galaxy", category: "Phones", price: 1000 },
    { id: 3, name: "MacBook", category: "Laptops", price: 2500 },
    { id: 4, name: "ThinkPad", category: "Laptops", price: 1800 },
    { id: 5, name: "iPad", category: "Tablets", price: 900 },
];




function categorizeByDevice( products: Product[]) 
{

    return products.reduce((result, product) => {
        if(!result[product.category]){
             result[product.category] = [];
        }

        result[product.category].push({
            id: product.id,
            name: product.name,
            price: product.price
        });
        return result;
    }, {} as Record<string, { id: number; name: string; price: number }[]>);
    
}