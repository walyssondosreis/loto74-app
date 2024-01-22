
export interface INavigationItem {
    name: string;
    href: string;
    method?: string;
    current?: boolean;
    subitems?: INavigationItem[];
}
