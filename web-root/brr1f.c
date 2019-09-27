#include <stdio.h>

int main(int argc, char *argv[])
{
        int size = 35;
        int inte[] = {97, 104, 101, 108, 108, 111, 44, 32, 104, 101, 108, 108, 111, 33, 32, 116, 104, 101, 32, 102, 108, 97, 103, 32, 105, 115, 32, 98, 105, 116, 119, 105, 115, 101, 114};
        printf("The Beef has Spoken! But where is the beef? ");
        for(int i = 0; i < size; i++){
                int n = (i)^0xb33f;
                printf("0x%04x  ",n);
        }
        return 0;
}

