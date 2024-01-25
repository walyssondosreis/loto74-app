
export interface NavigationItem {
    name: string;
    href: string;
    method?: string;
    current?: boolean;
    subitems?: NavigationItem[];
}
