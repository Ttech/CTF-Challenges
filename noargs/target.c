#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define SIZE 0x2ac

void start(char *argv[]) {
  char buf[SIZE];
  strcpy(buf, argv[1]);
  return;
}

int main(int argc, char *argv[]) {
  if (argc != 0) {
    printf("argc needs to be 0\n");
    exit(-1);
  }
  start(argv);
}
