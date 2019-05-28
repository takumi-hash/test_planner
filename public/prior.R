library(rjson)
library(pwr)

x1 <- commandArgs()[5]

xx1 <- fromJSON(x1);
result <- pwr.t.test(d=xx1['effect_size'], sig.level=xx1['p_value'], power=xx1['power'] );
tmp <- getwd();
cat(toJSON(c(xx1)));
