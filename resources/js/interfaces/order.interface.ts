export interface IOrder {
    id: string;
    number: string;
    date_view: string;
    customer?: {
        id: string;
        name: string;
        email?: string;
        mobile?: string;
        city?: string;
    };
    user: {
        id: string;
        name: string;
        email?: string;
        phone?: string;
    };
    order_details: {
        id: string;
        quantity: number;
        price: number;
        view_price: string;
        view_total: string;
        product: {
            id: string;
            name: string;
        };
    }[];
    discount?: number;
    discount_view?: string;
    is_delivery?: boolean;
    delivery_charge?: number;
    delivery_charge_view?: string;
    tax_rate?: number;
    subtotal_view?: string;
    tax_amount_view?: string;
    vat_view?: string;
    total?: number;
    total_view?: string;
    
    /** ✅ Added `settings` Property */
    settings?: {
        storeName?: string;
        storeAddress?: string;
        currency_symbol?: string;
        currency_position?: "before" | "after";
        logo?: string;
    };
}
